CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(100) NOT NULL,
    event_date DATE NOT NULL,
    description TEXT,
    status VARCHAR(20) DEFAULT 'Upcoming'
);

CREATE TABLE equipment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(50) NOT NULL,
    booked_by VARCHAR(50),
    booking_date DATE,
    status VARCHAR(20) DEFAULT 'Available'
);

CREATE TABLE volunteers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    event_id INT,
    role VARCHAR(50),
    phone VARCHAR(15)
);

CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_id INT,
    volunteer_name VARCHAR(50),
    comments TEXT,
    voice_note_path VARCHAR(200)
);
