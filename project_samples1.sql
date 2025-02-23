-- Run these commands in your database

-- Apps Projects
INSERT INTO projects (title, description, category, image_url, status, created_at, updated_at) VALUES
('Task Master Pro', 'A desktop productivity app built with Electron', 'apps', 'https://via.placeholder.com/300x200?text=TaskMaster', 'completed', NOW(), NOW()),
('Weather Buddy', 'Cross-platform mobile weather app', 'apps', 'https://via.placeholder.com/300x200?text=WeatherBuddy', 'completed', NOW(), NOW()),
('Code Timer', 'VS Code extension for time tracking', 'apps', 'https://via.placeholder.com/300x200?text=CodeTimer', 'completed', NOW(), NOW());

-- Web Projects
INSERT INTO projects (title, description, category, image_url, status, created_at, updated_at) VALUES
('Portfolio 2024', 'Personal portfolio website built with Laravel', 'web', 'https://via.placeholder.com/400x300?text=Portfolio', 'completed', NOW(), NOW()),
('E-Commerce Template', 'Modern e-commerce template with Next.js', 'web', 'https://via.placeholder.com/400x300?text=ECommerce', 'completed', NOW(), NOW()),
('Blog Platform', 'Custom blog platform with admin dashboard', 'web', 'https://via.placeholder.com/400x300?text=Blog', 'completed', NOW(), NOW());

-- 3D Projects
INSERT INTO projects (title, description, category, image_url, status, created_at, updated_at) VALUES
('Sci-Fi Room', 'Futuristic room environment in Blender', '3d', 'https://via.placeholder.com/300x300?text=SciFiRoom', 'completed', NOW(), NOW()),
('Character Model', 'Game-ready character model', '3d', 'https://via.placeholder.com/300x300?text=Character', 'completed', NOW(), NOW()),
('Abstract Animation', '3D abstract animation loop', '3d', 'https://via.placeholder.com/300x300?text=Animation', 'completed', NOW(), NOW());

-- Open Source Projects
INSERT INTO projects (title, description, category, image_url, status, created_at, updated_at) VALUES
('Laravel Package', 'Custom Laravel authentication package', 'opensource', 'https://via.placeholder.com/300x200?text=LaravelPkg', 'completed', NOW(), NOW()),
('VS Code Theme', 'Dark theme for VS Code', 'opensource', 'https://via.placeholder.com/300x200?text=VSTheme', 'completed', NOW(), NOW()),
('React Components', 'Collection of reusable React components', 'opensource', 'https://via.placeholder.com/300x200?text=ReactComps', 'completed', NOW(), NOW());