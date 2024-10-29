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
CREATE TABLE userAnswers (
    id INT AUTO_INCREMENT PRIMARY KEY,               -- Auto-incrementing ID
    user_id INT NOT NULL,                            -- Foreign key referencing users
    question_id INT NOT NULL,                        -- Foreign key referencing questions
    chosen_choice_id INT NOT NULL,                   -- Foreign key referencing choices
    FOREIGN KEY (user_id) REFERENCES users(id),     -- Foreign key constraint to users
    FOREIGN KEY (question_id) REFERENCES questions(id),  -- Foreign key constraint to questions
    FOREIGN KEY (chosen_choice_id) REFERENCES choices(id)  -- Foreign key constraint to choices
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
