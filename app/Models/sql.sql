INSERT INTO `students` (`id`, `name`, `created_at`, `updated_at`) 
VALUES (NULL, 'Amy', NULL, NULL);

INSERT INTO `students` (`id`, `name`, `created_at`, `updated_at`) 
VALUES (NULL, 'Amy', NULL, NULL),
(NULL, 'Bob', NULL, NULL),
(NULL, 'Cindy', NULL, NULL),
(NULL, 'Dan', NULL, NULL),
(NULL, 'Eden', NULL, NULL),
(NULL, 'Funny', NULL, NULL);

INSERT INTO `mobiles` (`id`, `student_id`, `mobile`, `created_at`, `updated_at`) 
VALUES 
(NULL, 1 , '0911', NULL, NULL),
(NULL, 2 , '0922', NULL, NULL),
(NULL, 3 , '0933', NULL, NULL),
(NULL, 4 , '0944', NULL, NULL),
(NULL, 5 , '0955', NULL, NULL),
(NULL, 6 , '0966', NULL, NULL);

INSERT INTO `loves` (`id`, `love`, `created_at`, `updated_at`, `student_id`) 
VALUES (NULL, '看電影', NULL, NULL, '3'),
(NULL, '登山', NULL, NULL, '3'),
(NULL, '打球', NULL, NULL, '3'),
(NULL, '看動漫', NULL, NULL, '3'),
(NULL, '寫code', NULL, NULL, '3');