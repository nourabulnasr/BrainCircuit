CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,         -- Auto-incrementing ID
    username VARCHAR(50) NOT NULL UNIQUE,      -- Unique username
    password VARCHAR(255) NOT NULL,             -- Password
    usertype TINYINT NOT NULL DEFAULT 1         -- User type: 0 = admin, 1 = student (default is student)
);

CREATE TABLE quizzes (
    id INT AUTO_INCREMENT PRIMARY KEY,      -- Auto-incrementing ID
    quiz_title VARCHAR(100) NOT NULL,       -- Title of the quiz
    subject VARCHAR(50) NOT NULL            -- Subject: store as VARCHAR instead of ENUM
);


CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,         -- Auto-incrementing ID
    quiz_id INT NOT NULL,                      -- Foreign key referencing quizzes
    choice_text TEXT NOT NULL,                 -- Text for the choice
    is_correct BOOLEAN NOT NULL,                -- Indicates if the choice is correct
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id)  -- Foreign key constraint
);

CREATE TABLE choices (
    id INT AUTO_INCREMENT PRIMARY KEY,         -- Auto-incrementing ID
    question_id INT NOT NULL,                  -- Foreign key referencing questions
    choice_text TEXT NOT NULL,                 -- Text for the choice
    is_correct BOOLEAN NOT NULL,               -- Indicates if this choice is the correct answer
    FOREIGN KEY (question_id) REFERENCES questions(id)  -- Foreign key constraint to questions
);
CREATE TABLE results (
    id INT AUTO_INCREMENT PRIMARY KEY,               -- Auto-incrementing ID
    user_id INT NOT NULL,                            -- Foreign key referencing users
    quiz_id INT NOT NULL,                            -- Foreign key referencing quizzes
    score INT NOT NULL,                              -- User's score for the quiz
    total_questions INT NOT NULL,                    -- Total number of questions in the quiz
    FOREIGN KEY (user_id) REFERENCES users(id),     -- Foreign key constraint to users
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id)    -- Foreign key constraint to quizzes
);

CREATE TABLE userAnswers (
    id INT AUTO_INCREMENT PRIMARY KEY,               -- Auto-incrementing ID
    user_id INT NOT NULL,                            -- Foreign key referencing users
    question_id INT NOT NULL,                        -- Foreign key referencing questions
    chosen_choice_id INT NOT NULL,                   -- Foreign key referencing choices
    FOREIGN KEY (user_id) REFERENCES users(id),     -- Foreign key constraint to users
    FOREIGN KEY (question_id) REFERENCES questions(id),  -- Foreign key constraint to questions
    FOREIGN KEY (chosen_choice_id) REFERENCES choices(id)  -- Foreign key constraint to choices
);












-- Inserting Users
INSERT INTO users (username, password, usertype) VALUES
('admin_user', 'hashed_admin_password', 0),
('student_user1', 'hashed_student_password1', 1),
('student_user2', 'hashed_student_password2', 1),
('student_user3', 'hashed_student_password3', 1);

-- Inserting Quizzes
INSERT INTO quizzes (quiz_title, subject) VALUES
('Math Quiz 1', 'Mathematics'),
('Science Quiz 1', 'Science'),
('History Quiz 1', 'History'),
('Geography Quiz 1', 'Geography');

-- Inserting Questions
INSERT INTO questions (quiz_id, choice_text, is_correct) VALUES
(1, 'What is 2 + 2?', 1),
(1, 'What is 3 + 5?', 0),
(2, 'What is the chemical symbol for water?', 1),
(2, 'What is H2?', 0),
(3, 'Who was the first President of the USA?', 1),
(3, 'What year did WWII end?', 0);

-- Inserting Choices
INSERT INTO choices (question_id, choice_text, is_correct) VALUES
(1, '4', 1),
(1, '5', 0),
(2, 'H2O', 1),
(2, 'O2', 0),
(3, 'George Washington', 1),
(3, 'Abraham Lincoln', 0),
(4, '1945', 1),
(4, '1969', 0);

-- Inserting Results
INSERT INTO results (user_id, quiz_id, score, total_questions) VALUES
(1, 1, 3, 3),  -- Admin user took Math Quiz 1
(2, 2, 2, 2),  -- Student 1 took Science Quiz 1
(3, 3, 1, 2);  -- Student 2 took History Quiz 1

-- Inserting User Answers
INSERT INTO userAnswers (user_id, question_id, chosen_choice_id) VALUES
(1, 1, 1),  -- Admin user answered question 1 with choice 1
(1, 2, 2),  -- Admin user answered question 2 with choice 2
(2, 3, 3),  -- Student 1 answered question 3 with choice 3
(2, 4, 4);  -- Student 1 answered question 4 with choice 4
