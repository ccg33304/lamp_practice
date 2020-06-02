CREATE TABLE orders
  (
    order_id INT AUTO_INCREMENT,
    user_id INT NOT NULL,
    create_datetime DATETIME,
    primary key(order_id)
  );

CREATE TABLE order_details
  (
    order_id INT,
    item_id INT NOT NULL,
    price INT NOT NULL,
    amount INT NOT NULL
  );