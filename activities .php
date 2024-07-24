CREATE TABLE activities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    baby_id INT NOT NULL,
    activity_name VARCHAR(100) NOT NULL,
    activity_date DATE NOT NULL,
    notes TEXT,
    FOREIGN KEY (baby_id) REFERENCES babies(id)
);
