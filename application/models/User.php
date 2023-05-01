<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    //отображение всех пользователей
	public function select()
	{
        $query = $this->db->get('users');
        return $query->result_array();
    }

    //отображение всех юзеров (роль = 0)
    public function select_user()
    {
        $query = $this->db->get_where('users', array('role' => 0));
        return $query->result_array();
    }

    //проверка логина
    public function valid($login)
    {
        $query = $this->db->get_where('users', array('login' => $login));
        return $query->result_array();
    }

    //добавление пользователя - (регистрация)
    public function insert_user($first_name, $name, $patronymic, $date_birth, $pol, $login, $password)
    {
        $data = array(
            'first_name' => $first_name,    //фамилия
            'name' => $name,                //имя
            'patronymic' => $patronymic,    //отчество
            'date_birth' => $date_birth,    //дата рождения
            'pol' => $pol,                  //пол
            'login' => $login,              //логин
            'password' => $password,        //пароль
            'role' => 0                     //роль 0 = обычный пользователь
        );
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    //проверка логина и пароля (авторизация)
    public function authorization($login, $password)
    {
        $query = $this->db->get_where('users', array('login' => $login, 'password' => $password));
		return $query->row_array();
    }

    //изменение пользователя
    public function update($id_user, $first_name, $name, $patronymic, $date_birth, $pol, $login, $password)
    {
        $data = array(
            'first_name' => $first_name,
            'name' => $name,
            'patronymic' => $patronymic,
            'date_birth' => $date_birth,
            'pol' => $pol,
            'login' => $login,
            'password' => $password
        );
        $this->db->where('id_user', $id_user);
        $this->db->update('users', $data);
    }

    //удаление пользователя
    public function delete($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('users');
    }

    //отображение профиля
    public function profile_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    //редактирование профиля
    public function update_profile($id_user, $first_name, $name, $patronymic, $date_birth, $pol)
    {
        $data = array(
			'first_name' => $first_name,
            'name' => $name,
            'patronymic' => $patronymic,
            'date_birth' => $date_birth,
            'pol' => $pol
		);
		$this->db->where('id_user', $id_user);
		$this->db->update('users', $data);
    }
}
