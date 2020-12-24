CREATE TABLE `admins`
(
    `id`         bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `username`   varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `password`   varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `admins_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `articles`
(
    `id`         bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `title`      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `markdown`   mediumtext COLLATE utf8mb4_unicode_ci   NOT NULL,
    `content`    mediumtext COLLATE utf8mb4_unicode_ci   NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users`
(
    `id`                bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `name`              varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `password`          varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `avatar`            varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `phone`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `age`               int(10) unsigned NOT NULL,
    `address`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `remember_token`    varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at`        timestamp NULL DEFAULT NULL,
    `updated_at`        timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
