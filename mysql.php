CREATE TABLE babies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    dob DATE NOT NULL,
    parent_name VARCHAR(100) NOT NULL,
    contact_number VARCHAR(20) NOT NULL,
    address TEXT,
    enrolled_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
