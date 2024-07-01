<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model 
{

  public function __construct()
  {
    parent::__construct();
  }

  public function logged_in($username)
  {
    return $this->db
            ->select()
            ->where('username', $username)
            ->limit(1)
            ->get('users');
  }

  public function get_post_numrows()
  {
    return $this->db
            ->select('id_berita')
            ->where('is_delete = 0')
            ->get('posts')
            ->num_rows();
  }

  public function get_category_numrows()
  {
    return $this->db
            ->select('id_berita')
            ->where('is_delete = 0')
            ->get('categories')
            ->num_rows();
  }

  public function get_user_numrows()
  {
    return $this->db
            ->select('id_user')
            ->get('users')
            ->num_rows();
  }

  public function get_all_posts()
  {
    return $this->db
            ->select('p.id, p.post_title, c.cat_title, p.created_at')
            ->where('p.post_cat_id = c.id AND p.is_delete = 0')
            ->get('posts p, categories c')
            ->result();
  }

  public function get_all_categories()
  {
    return $this->db
            ->select('id, cat_title')
            ->where('is_delete = 0')
            ->get('categories')
            ->result();
  }

  public function insert_new_post($data)
  {
    return $this->db
            ->insert('posts', $data);
  }

  public function update_post($data, $id)
  {
    return $this->db
            ->where('id', $id)
            ->update('posts', $data);
  }

  public function delete_post($id)
  {
    return $this->db
            ->where('id', $id)
            ->update('posts', array('is_delete' => 1));
  }

  public function get_post_row_obj($id)
  {
    return $this->db
            ->where('id = ' . $id)
            ->get('posts')
            ->row();
  }

  public function insert_new_cat($data)
  {
    return $this->db
            ->insert('categories', $data);
  }

  public function update_cat($data, $id)
  {
    return $this->db
            ->where('id', $id)
            ->update('categories', $data);
  }

   public function delete_cat($id)
  {
    return $this->db
            ->where('id', $id)
            ->update('categories', array('is_delete' => 1));
  }
}
