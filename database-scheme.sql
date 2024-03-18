CREATE TABLE Users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255),
    user_pic VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    address TEXT,
    phone_number VARCHAR(20)
);

CREATE TABLE Categories (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(255),
    image VARCHAR (255)
);

CREATE TABLE Subcategories (
    subcategory_id INT PRIMARY KEY AUTO_INCREMENT,
    subcategory_name VARCHAR(255),
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);
CREATE TABLE Specifications (
    specification_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    subcategory_id INT,
    FOREIGN KEY (subcategory_id) REFERENCES Subcategories(subcategory_id)
);

Create Table Brands(
brand_id INT PRIMARY KEY AUTO_INCREMENT,
brand_name VARCHAR(255)
);

CREATE TABLE Products (
    product_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    description TEXT,
    price DECIMAL(10, 2),
    quantity_available INT,
    category_id INT,
    subcategory_id INT,
    brand_id INT,
    specifications JSON,
    FOREIGN KEY (category_id) REFERENCES Categories(category_id),
    FOREIGN KEY (subcategory_id) REFERENCES Subcategories(subcategory_id)
    FOREIGN KEY (brand_id) REFERENCES Brands(brand_id)
);

Create Table Product_Images(
    id INT PRIMARY KEY AUTO_INCREMENT,
    path VARCHAR(255),
    is_main_image DEFAULT false
    product_id INT,
    FOREIGN KEY (product_id) REFERENCES Products(product_id)
)

CREATE TABLE ProductSpecifications (
    product_id INT,
    specification_id INT,
    value VARCHAR(255),
    FOREIGN KEY (product_id) REFERENCES Products(product_id),
    FOREIGN KEY (specification_id) REFERENCES Specifications(specification_id),
    PRIMARY KEY (product_id, specification_id)
);


CREATE TABLE Orders (
    order_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    order_date DATE,
    total_amount DECIMAL(10, 2),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Order_Items (
    order_item_id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    product_id INT,
    quantity INT,
    unit_price DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES Orders(order_id),
    FOREIGN KEY (product_id) REFERENCES Products(product_id)
);

CREATE TABLE Reviews (
    review_id INT PRIMARY KEY AUTO_INCREMENT,
    product_id INT,
    user_id INT,
    rating INT,
    comment TEXT,
    review_date DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (product_id) REFERENCES Products(product_id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);


-- Brands
INSERT INTO Brands (brand_id, brand_name) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Lenovo'),
(4, 'Microsoft'),


-- Categories
INSERT INTO Categories (category_id, category_name) VALUES
(1, 'Electronics'),

-- Subcategories
INSERT INTO Subcategories (subcategory_id, subcategory_name, category_id) VALUES
(1, 'Smartphones', 1),
(2, 'Laptops', 1),
(3,'Tablets', 1),
(4,'Smartwatches', 1);


-- Electronics: Smartphones
INSERT INTO Products (name, description, price, quantity_available, category_id, sub_category_id , brand_id, specifications) VALUES
('iPhone 12', 'Previous generation iPhone', 799.99, 80, 1, 1, 1, '{"color": "White", "storage": "64GB"}'),
('Samsung Galaxy Note 20 Ultra', 'Flagship smartphone with stylus', 1099.99, 60, 1, 1, 2, '{"color": "Mystic Bronze", "storage": "256GB"}');

-- Electronics: Laptops
INSERT INTO Products (name, description, price, quantity_available, category_id, sub_category_id , brand_id, specifications) VALUES
('Microsoft Surface Laptop 4', 'Sleek and powerful laptop', 1299.99, 50, 1, 2, 4, '{"processor": "Intel Core i5", "memory": "8GB", "storage": "256GB SSD"}'),
('Lenovo ThinkPad X1 Carbon', 'Business-class ultrabook', 1499.99, 40, 1, 2, 3, '{"processor": "Intel Core i7", "memory": "16GB", "storage": "512GB SSD"}');

-- Electronics: Tablets
INSERT INTO Products (name, description, price, quantity_available, category_id, sub_category_id, brand_id, specifications) VALUES
('iPad Air', 'Powerful tablet from Apple', 599.99, 50, 1, 3, 1, '{"color": "Space Gray", "storage": "64GB", "screen_size": "10.9 inches"}'),
('Samsung Galaxy Tab S7', 'Android tablet with AMOLED display', 649.99, 40, 1, 3, 2, '{"color": "Mystic Black", "storage": "128GB", "screen_size": "11 inches"}');

-- Electronics: Smartwatches
INSERT INTO Products (name, description, price, quantity_available, category_id, sub_category_id, brand_id, specifications) VALUES
('Apple Watch SE', 'Affordable smartwatch from Apple', 279.99, 60, 1, 4, 1, '{"color": "Silver", "size": "40mm", "battery_life": "Up to 18 hours"}'),
('Samsung Galaxy Watch 4', 'Fitness-focused smartwatch', 349.99, 50, 1, 4, 2, '{"color": "Phantom Black", "size": "44mm", "battery_life": "Up to 40 hours"}');


-- Insert sample users
INSERT INTO Users (username, email, password, address, phone_number,user_pic) VALUES
('John Doe', 'john@example.com', '123', '123 Main St, City', '123-456-7890','https://img.freepik.com/free-photo/man-green-shirt-having-his-arms-crossed_23-2148401380.jpg'),
('Jane Smith', 'jane@example.com', '123', '456 Elm St, Town', '987-654-3210','https://img.freepik.com/free-photo/young-bearded-man-with-striped-shirt_273609-5677.jpg');

-- Insert sample reviews
INSERT INTO Reviews (product_id, user_id, rating, comment, review_date) VALUES
(1, 1, 5, 'Great phone, amazing camera quality!', '2024-03-10'),
(1, 2, 5, 'Love everything about it, highly recommend!', '2024-03-11');


INSERT INTO Specifications (name, subcategory_id)
VALUES
    ('Screen Size', 1),
    ('RAM Capacity', 1),
    ('Storage Capacity', 1),
    ('Processor', 1),
    ('Operating System', 1),
    ('Camera Resolution', 1),
    ('Battery Capacity', 1),
    ('Connectivity', 1),
    ('Dimensions', 1),
    ('Weight', 1),
    ('SIM Type', 1),
    ('Colors Available', 1),
    ('Display Type', 1),
    ('Display Resolution', 1),
    ('Display Features', 1),
    ('Biometric Authentication', 1),
    ('Water and Dust Resistance', 1),
    ('Wireless Charging', 1),
    ('Fast Charging', 1),
    ('Audio Features', 1),
    ('Additional Sensors', 1),
    ('Screen Size', 2),
    ('RAM Capacity', 2),
    ('Storage Capacity', 2),
    ('Processor', 2),
    ('Operating System', 2),
    ('Graphics Card', 2),
    ('Display Resolution', 2),
    ('Display Type', 2),
    ('Battery Life', 2),
    ('Weight', 2),
    ('Dimensions', 2),
    ('Ports', 2),
    ('Wireless Connectivity', 2),
    ('Keyboard Type', 2),
    ('Touchscreen', 2),
    ('Webcam', 2),
    ('Audio Features', 2),
    ('Security Features', 2),
    ('Color', 2),
    ('Screen Size', 3),
    ('RAM Capacity', 3),
    ('Storage Capacity', 3),
    ('Processor', 3),
    ('Operating System', 3),
    ('Display Resolution', 3),
    ('Display Type', 3),
    ('Battery Life', 3),
    ('Weight', 3),
    ('Dimensions', 3),
    ('Camera Resolution', 3),
    ('Connectivity', 3),
    ('Ports', 3),
    ('Wireless Connectivity', 3),
    ('Biometric Authentication', 3),
    ('Color', 3);
    ('Display Type', 4),
    ('Display Size', 4),
    ('Resolution', 4),
    ('Operating System', 4),
    ('Processor', 4),
    ('Storage Capacity', 4),
    ('RAM Capacity', 4),
    ('Battery Life', 4),
    ('Connectivity', 4),
    ('Sensors', 4),
    ('Water Resistance', 4),
    ('GPS', 4),
    ('NFC', 4),
    ('Bluetooth', 4),
    ('Heart Rate Monitor', 4),
    ('Fitness Tracking', 4),
    ('Sleep Tracking', 4),
    ('Music Playback', 4),
    ('Voice Assistant', 4),
    ('Color', 4);