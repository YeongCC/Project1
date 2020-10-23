<?php
  class Transaction {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function addTransaction($data) {
      // Prepare Query
      $this->db->query('INSERT INTO stripe (id, order_id, product, amount, currency, status) VALUES(:id, :order_id, :product, :amount, :currency, :status)');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':order_id', $data['order_id']);
      $this->db->bind(':product', $data['product']);
      $this->db->bind(':amount', $data['amount']);
      $this->db->bind(':currency', $data['currency']);
      $this->db->bind(':status', $data['status']);

      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    public function getTransactions() {
      $this->db->query('SELECT * FROM stripe ORDER BY created_at DESC');

      $results = $this->db->resultset();

      return $results;
    }
  }