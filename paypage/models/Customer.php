<?php
  class Customer {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function addCustomer($data) {
      // Prepare Query
      $this->db->query('INSERT INTO payment (id,order_id,email,Name, PhoneNo,Address,price,time_date,payment_way,status,receive) VALUES(:id,:order_id, :email,:Name, :PhoneNo,  :Address,:price,:time_date,:payment_way, :status, :receive)');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':order_id', $data['order_id']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':Name', $data['Name']);
      $this->db->bind(':PhoneNo', $data['PhoneNo']);
      $this->db->bind(':Address', $data['Address']);      
      $this->db->bind(':price', $data['price']);
      $this->db->bind(':time_date', $data['time_date']);
      $this->db->bind(':payment_way', $data['payment_way']);
      $this->db->bind(':status', $data['status']);
      $this->db->bind(':receive', $data['receive']);

      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    public function getCustomers() {
      $this->db->query('SELECT * FROM payment ORDER BY created_at DESC');

      $results = $this->db->resultset();

      return $results;
    }
  }