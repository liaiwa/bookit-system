-- ============================================
-- LECTURER BOOKING SYSTEM - COMPLETE DATABASE
-- ============================================

-- 1. PERSON A: ARLIA - AUTHENTICATION & USERS
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('student', 'lecturer', 'admin') NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS profiles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    avatar_url VARCHAR(255),
    date_of_birth DATE,
    address TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- 2. PERSON B: LISA - ACADEMIC STRUCTURE
CREATE TABLE IF NOT EXISTS faculties (
    id INT PRIMARY KEY AUTO_INCREMENT,
    faculty_code VARCHAR(10) UNIQUE NOT NULL,
    faculty_name VARCHAR(100) NOT NULL,
    dean_name VARCHAR(100),
    contact_email VARCHAR(100),
    contact_phone VARCHAR(20),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS programmes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    programme_code VARCHAR(20) UNIQUE NOT NULL,
    programme_name VARCHAR(100) NOT NULL,
    faculty_id INT,
    duration_years INT DEFAULT 3,
    total_credits INT DEFAULT 120,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (faculty_id) REFERENCES faculties(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT UNIQUE,
    student_id VARCHAR(20) UNIQUE NOT NULL,
    programme_id INT,
    year_of_study INT DEFAULT 1,
    semester INT DEFAULT 1,
    cgpa DECIMAL(3,2) DEFAULT 0.00,
    enrollment_date DATE,
    graduation_date DATE NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (programme_id) REFERENCES programmes(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS lecturers (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT UNIQUE,
    lecturer_id VARCHAR(20) UNIQUE NOT NULL,
    faculty_id INT,
    position VARCHAR(50) DEFAULT 'Lecturer',
    expertise TEXT,
    office_location VARCHAR(100),
    office_hours TEXT,
    max_students_per_day INT DEFAULT 5,
    consultation_duration INT DEFAULT 30,
    is_available_for_booking BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (faculty_id) REFERENCES faculties(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS admins (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT UNIQUE,
    admin_level ENUM('super', 'regular') DEFAULT 'regular',
    department VARCHAR(100),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- 3. PERSON C: KHAI - APPOINTMENT SYSTEM
CREATE TABLE IF NOT EXISTS availability_slots (
    id INT PRIMARY KEY AUTO_INCREMENT,
    lecturer_id INT NOT NULL,
    slot_date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    day_of_week VARCHAR(10),
    max_bookings INT DEFAULT 1,
    booked_count INT DEFAULT 0,
    is_available BOOLEAN DEFAULT TRUE,
    is_recurring BOOLEAN DEFAULT FALSE,
    recurrence_pattern ENUM('daily', 'weekly', 'monthly') NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (lecturer_id) REFERENCES lecturers(id) ON DELETE CASCADE,
    UNIQUE KEY unique_lecturer_slot (lecturer_id, slot_date, start_time)
);

CREATE TABLE IF NOT EXISTS appointments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    booking_code VARCHAR(20) UNIQUE NOT NULL,
    student_id INT NOT NULL,
    lecturer_id INT NOT NULL,
    slot_id INT,
    appointment_date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    status ENUM('pending', 'approved', 'rejected', 'cancelled', 'completed', 'no_show') DEFAULT 'pending',
    purpose ENUM('academic', 'personal', 'career', 'research', 'other') DEFAULT 'academic',
    description TEXT,
    student_notes TEXT,
    lecturer_notes TEXT,
    meeting_mode ENUM('in_person', 'online', 'phone') DEFAULT 'in_person',
    meeting_link VARCHAR(255),
    booked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    reminder_sent BOOLEAN DEFAULT FALSE,
    rating INT CHECK (rating >= 1 AND rating <= 5) NULL,
    feedback TEXT,
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (lecturer_id) REFERENCES lecturers(id) ON DELETE CASCADE,
    FOREIGN KEY (slot_id) REFERENCES availability_slots(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS blocked_slots (
    id INT PRIMARY KEY AUTO_INCREMENT,
    blocked_by ENUM('admin', 'lecturer', 'system') NOT NULL,
    lecturer_id INT NULL,
    block_date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    reason ENUM('holiday', 'maintenance', 'emergency', 'personal', 'other') DEFAULT 'other',
    description TEXT,
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_active BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (lecturer_id) REFERENCES lecturers(id) ON DELETE CASCADE
);

-- 4. PERSON D: AUFA - NOTIFICATIONS
CREATE TABLE IF NOT EXISTS notifications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    title VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    type ENUM('booking_created', 'booking_approved', 'booking_rejected', 
              'booking_reminder', 'booking_cancelled', 'slot_blocked', 
              'slot_available', 'system_alert', 'message') DEFAULT 'system_alert',
    related_id INT NULL,
    related_type VARCHAR(50) NULL,
    is_read BOOLEAN DEFAULT FALSE,
    is_important BOOLEAN DEFAULT FALSE,
    action_url VARCHAR(255) NULL,
    scheduled_for TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS notification_preferences (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT UNIQUE NOT NULL,
    email_notifications BOOLEAN DEFAULT TRUE,
    push_notifications BOOLEAN DEFAULT TRUE,
    sms_notifications BOOLEAN DEFAULT FALSE,
    booking_reminders BOOLEAN DEFAULT TRUE,
    booking_updates BOOLEAN DEFAULT TRUE,
    system_announcements BOOLEAN DEFAULT TRUE,
    reminder_before_hours INT DEFAULT 24,
    quiet_hours_start TIME DEFAULT '22:00:00',
    quiet_hours_end TIME DEFAULT '08:00:00',
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);