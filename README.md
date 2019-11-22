# CodeIgniter-Insert-Batch-on-DUPLICATE-KEY-Update
This class helps you to extend the coeigniter mysqli driver to be able to support update on duplicate while inserting batch feature. This allows you to be able to supply a an array of key value pairs to be inserted into separate rows.

1. Copy Both My_Loader.php and MY_DB_mysqli_driver.php to "application/core" folder.
2. Use $this->db->insert_on_duplicate_update_batch() inseated of $this->db->insert_batch()

This will auto update data if duplicate key occurs in DB.

Support By: <a href="https://www.ranglerz.com">Ranglerz</a>
