CREATE TABLE `post_topic_relationship` (
`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`post_id` int(11) DEFAULT NULL UNIQUE,
`topic_id` int(11) DEFAULT NULL,
FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
FOREIGN KEY (`topic_id`) REFERENCES `post_type` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;