<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDN File Browser</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    }

    :root {
        --bg-primary: #1c1c1e;
        --bg-secondary: #2c2c2e;
        --bg-tertiary: #3a3a3c;
        --text-primary: #ffffff;
        --text-secondary: #ebebf5;
        --text-tertiary: #98989d;
        --accent: #0a84ff;
        --accent-hover: #409cff;
        --success: #30d158;
        --warning: #ff9f0a;
        --danger: #ff453a;
        --border: #404044;
        --shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
    }

    body {
        background-color: var(--bg-primary);
        color: var(--text-primary);
        line-height: 1.6;
        min-height: 100vh;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    header {
        background: var(--bg-secondary);
        padding: 25px 0;
        border-radius: 16px;
        margin-bottom: 20px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 25px;
    }

    h1 {
        font-size: 28px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .logo {
        color: var(--accent);
    }

    .breadcrumb {
        background-color: var(--bg-secondary);
        padding: 14px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        border: 1px solid var(--border);
        font-size: 14px;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
    }

    .breadcrumb a {
        color: var(--accent);
        text-decoration: none;
        padding: 4px 8px;
        border-radius: 6px;
        transition: background-color 0.2s;
    }

    .breadcrumb a:hover {
        background-color: var(--bg-tertiary);
    }

    .breadcrumb .separator {
        color: var(--text-tertiary);
    }

    .breadcrumb .outside-warning {
        color: var(--danger);
        font-size: 12px;
        background: rgba(255, 69, 58, 0.1);
        padding: 4px 8px;
        border-radius: 6px;
        margin-left: 10px;
    }

    .navigation-warning {
        background: rgba(255, 69, 58, 0.1);
        border: 1px solid var(--danger);
        color: var(--danger);
        padding: 12px 16px;
        border-radius: 10px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .navigation-warning i {
        font-size: 16px;
    }

    .stats-bar {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .stat-item {
        background: var(--bg-secondary);
        padding: 15px 20px;
        border-radius: 12px;
        border: 1px solid var(--border);
        flex: 1;
        min-width: 200px;
    }

    .stat-label {
        color: var(--text-tertiary);
        font-size: 14px;
        margin-bottom: 5px;
    }

    .stat-value {
        font-size: 18px;
        font-weight: 600;
        color: var(--accent);
    }

    .file-browser {
        background-color: var(--bg-secondary);
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid var(--border);
    }

    .file-header {
        display: grid;
        grid-template-columns: 3fr 1fr 1fr 120px;
        padding: 16px 20px;
        background-color: var(--bg-tertiary);
        border-bottom: 1px solid var(--border);
        font-weight: 600;
        color: var(--text-secondary);
        font-size: 14px;
    }

    .file-item {
        display: grid;
        grid-template-columns: 3fr 1fr 1fr 120px;
        padding: 14px 20px;
        border-bottom: 1px solid var(--border);
        align-items: center;
    }

    .file-item:hover {
        background-color: var(--bg-tertiary);
    }

    .file-item:last-child {
        border-bottom: none;
    }

    .file-name {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .file-icon {
        font-size: 18px;
        width: 20px;
        text-align: center;
    }

    .folder {
        color: var(--warning);
    }

    .file {
        color: var(--accent);
    }

    .file-link {
        color: var(--text-primary);
        text-decoration: none;
    }

    .file-link:hover {
        color: var(--accent);
    }

    .file-type,
    .file-size {
        color: var(--text-tertiary);
        font-size: 14px;
    }

    .file-actions {
        display: flex;
        gap: 8px;
        justify-content: flex-end;
    }

    .btn {
        background: transparent;
        color: var(--text-tertiary);
        border: 1px solid var(--border);
        padding: 6px 10px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
        transition: all 0.2s;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
    }

    .btn:hover {
        background: var(--accent);
        color: white;
        border-color: var(--accent);
    }

    .btn-copy:hover {
        background: var(--success);
        border-color: var(--success);
    }

    .btn-warning:hover {
        background: var(--warning);
        border-color: var(--warning);
    }

    .empty-folder {
        padding: 60px 20px;
        text-align: center;
        color: var(--text-tertiary);
    }

    footer {
        text-align: center;
        margin-top: 30px;
        color: var(--text-tertiary);
        font-size: 14px;
    }

    .copy-notification {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: var(--success);
        color: white;
        padding: 10px 16px;
        border-radius: 8px;
        display: none;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        z-index: 1000;
    }

    .copy-notification.show {
        display: flex;
        animation: fadeInOut 2s ease-in-out;
    }

    @keyframes fadeInOut {

        0%,
        100% {
            opacity: 0;
            transform: translateY(10px);
        }

        20%,
        80% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .loading {
        opacity: 0.6;
        pointer-events: none;
    }

    /* Mobile Styles */
    @media (max-width: 768px) {
        .container {
            padding: 15px;
        }

        .header-content {
            flex-direction: column;
            gap: 12px;
            align-items: flex-start;
        }

        h1 {
            font-size: 24px;
        }

        .stats-bar {
            flex-direction: column;
            gap: 10px;
        }

        .stat-item {
            min-width: auto;
        }

        .file-header {
            display: none;
        }

        .file-item {
            grid-template-columns: 1fr;
            gap: 12px;
            padding: 16px;
            position: relative;
        }

        .file-actions {
            justify-content: flex-start;
            position: absolute;
            top: 16px;
            right: 16px;
        }

        .file-name {
            padding-right: 100px;
        }

        .file-type,
        .file-size {
            font-size: 13px;
        }

        .breadcrumb {
            font-size: 13px;
        }
    }

    @media (max-width: 480px) {
        .file-actions {
            position: static;
            justify-content: flex-start;
            margin-top: 10px;
        }

        .file-name {
            padding-right: 0;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="header-content">
                <h1><i class="fas fa-cloud logo"></i> CDN Browser</h1>
                <div style="font-size: 14px; color: var(--text-tertiary);">
                    <?php 
                    $currentPath = isset($_GET['path']) ? $_GET['path'] : '/';
                    echo htmlspecialchars($currentPath); 
                    ?>
                </div>
            </div>
        </header>

        <?php
        // Cấu hình
        $baseDir = __DIR__; // Thư mục gốc của CDN
        $allowOutsideNavigation = true; // Cho phép duyệt ra ngoài thư mục gốc
        
        // Xác định thư mục hiện tại
        $requestedPath = isset($_GET['path']) ? $_GET['path'] : '';
        $currentDir = realpath($baseDir . '/' . $requestedPath);
        
        // Kiểm tra xem có đang ở ngoài thư mục gốc không
        $isOutsideBaseDir = false;
        if ($currentDir === false || strpos($currentDir, $baseDir) !== 0) {
            $isOutsideBaseDir = true;
            // Nếu không cho phép ra ngoài, quay về thư mục gốc
            if (!$allowOutsideNavigation) {
                header('Location: ?');
                exit;
            }
            $currentDir = realpath($requestedPath) ?: '/';
        }
        
        // Xác định URL gốc
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $baseUrl = $protocol . '://' . $host . dirname($_SERVER['PHP_SELF']);
        if (substr($baseUrl, -1) !== '/') {
            $baseUrl .= '/';
        }
        
        // Hàm tính dung lượng thư mục
        function getFolderSize($path) {
            if (!is_dir($path)) return 0;
            
            $totalSize = 0;
            try {
                $files = new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS),
                    RecursiveIteratorIterator::CHILD_FIRST
                );
                
                foreach ($files as $file) {
                    if ($file->isFile()) {
                        $totalSize += $file->getSize();
                    }
                }
            } catch (Exception $e) {
                // Không có quyền truy cập vào thư mục
            }
            
            return $totalSize;
        }
        
        // Hàm định dạng dung lượng
        function formatSize($bytes) {
            if ($bytes >= 1073741824) {
                return number_format($bytes / 1073741824, 2) . ' GB';
            } elseif ($bytes >= 1048576) {
                return number_format($bytes / 1048576, 2) . ' MB';
            } elseif ($bytes >= 1024) {
                return number_format($bytes / 1024, 2) . ' KB';
            } else {
                return $bytes . ' B';
            }
        }
        
        // Hàm lấy thư mục cha
        function getParentDirectory($path) {
            $parent = dirname($path);
            return $parent === '.' ? '' : $parent;
        }
        
        // Tính toán thống kê
        $fileCount = 0;
        $folderCount = 0;
        $totalSize = 0;
        
        if (is_dir($currentDir)) {
            try {
                $items = scandir($currentDir);
                foreach ($items as $item) {
                    if ($item === '.' || $item === '..' || $item === basename(__FILE__)) {
                        continue;
                    }
                    
                    $fullPath = $currentDir . '/' . $item;
                    
                    if (is_dir($fullPath)) {
                        $folderCount++;
                        $totalSize += getFolderSize($fullPath);
                    } else {
                        $fileCount++;
                        $totalSize += @filesize($fullPath) ?: 0;
                    }
                }
            } catch (Exception $e) {
                // Không có quyền đọc thư mục
            }
        }
        ?>

        <div class="breadcrumb">
            <?php
            // Hiển thị breadcrumb với khả năng đi ra ngoài
            $pathParts = ['' => 'Root'];
            $accumulatedPath = '';
            
            if ($requestedPath) {
                $parts = explode('/', trim($requestedPath, '/'));
                foreach ($parts as $part) {
                    if (!empty($part)) {
                        $accumulatedPath .= $part . '/';
                        $pathParts[$accumulatedPath] = $part;
                    }
                }
            }
            
            // Thêm nút "Go Up" nếu không phải root
            if ($requestedPath !== '') {
                $parentPath = getParentDirectory($requestedPath);
                echo '<a href="?path=' . urlencode($parentPath) . '" title="Thư mục cha"><i class="fas fa-arrow-up"></i></a>';
                echo '<span class="separator">/</span>';
            }
            
            // Hiển thị các phần của breadcrumb
            $first = true;
            foreach ($pathParts as $path => $name) {
                if (!$first) {
                    echo '<span class="separator">/</span>';
                }
                echo '<a href="?path=' . urlencode($path) . '">' . htmlspecialchars($name) . '</a>';
                $first = false;
            }
            
            // Cảnh báo nếu đang ở ngoài thư mục gốc
            if ($isOutsideBaseDir) {
                echo '<span class="outside-warning"><i class="fas fa-exclamation-triangle"></i> Ngoài CDN</span>';
            }
            ?>
        </div>

        <?php if ($isOutsideBaseDir): ?>
        <div class="navigation-warning">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Bạn đang duyệt bên ngoài thư mục CDN gốc</strong>
                <div style="font-size: 13px; margin-top: 4px;">Đường dẫn hiện tại:
                    <?php echo htmlspecialchars($currentDir); ?></div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (is_dir($currentDir)): ?>
        <div class="stats-bar">
            <div class="stat-item">
                <div class="stat-label">Tổng dung lượng</div>
                <div class="stat-value"><?php echo formatSize($totalSize); ?></div>
            </div>
            <div class="stat-item">
                <div class="stat-label">Số thư mục</div>
                <div class="stat-value"><?php echo $folderCount; ?></div>
            </div>
            <div class="stat-item">
                <div class="stat-label">Số tập tin</div>
                <div class="stat-value"><?php echo $fileCount; ?></div>
            </div>
            <div class="stat-item">
                <div class="stat-label">Tổng cộng</div>
                <div class="stat-value"><?php echo ($folderCount + $fileCount); ?> mục</div>
            </div>
        </div>
        <?php endif; ?>

        <div class="file-browser">
            <div class="file-header">
                <div>Tên</div>
                <div>Loại</div>
                <div>Kích thước</div>
                <div></div>
            </div>

            <?php
            // Kiểm tra xem thư mục có tồn tại và có quyền đọc không
            if (!is_dir($currentDir) || !is_readable($currentDir)) {
                echo '<div class="empty-folder">';
                echo '<i class="fas fa-exclamation-circle" style="font-size: 48px; margin-bottom: 16px; color: var(--danger);"></i>';
                echo '<div>Không thể truy cập thư mục</div>';
                if (!$isOutsideBaseDir) {
                    echo '<div style="font-size: 14px; margin-top: 8px; color: var(--text-tertiary);">';
                    echo '<a href="?" style="color: var(--accent);">Quay về thư mục gốc</a>';
                    echo '</div>';
                }
                echo '</div>';
            } else {
                // Lấy danh sách các tệp và thư mục
                try {
                    $items = scandir($currentDir);
                    $directories = [];
                    $files = [];
                    
                    foreach ($items as $item) {
                        if ($item === '.' || $item === '..' || $item === basename(__FILE__)) {
                            continue;
                        }
                        
                        $fullPath = $currentDir . '/' . $item;
                        
                        if (is_dir($fullPath)) {
                            $directories[] = $item;
                        } else {
                            $files[] = $item;
                        }
                    }
                    
                    // Sắp xếp theo thứ tự bảng chữ cái
                    sort($directories);
                    sort($files);
                    
                    // Hiển thị thư mục trước
                    foreach ($directories as $item) {
                        $fullPath = $currentDir . '/' . $item;
                        $relativePath = $requestedPath . $item . '/';
                        $folderUrl = $isOutsideBaseDir ? '' : $baseUrl . $relativePath;
                        $folderSize = getFolderSize($fullPath);
                        
                        echo '<div class="file-item">';
                        echo '<div class="file-name">';
                        echo '<span class="file-icon folder"><i class="fas fa-folder"></i></span>';
                        echo '<a class="file-link" href="?path=' . urlencode($relativePath) . '">' . htmlspecialchars($item) . '</a>';
                        echo '</div>';
                        echo '<div class="file-type">Thư mục</div>';
                        echo '<div class="file-size">' . formatSize($folderSize) . '</div>';
                        echo '<div class="file-actions">';
                        echo '<a class="btn" href="?path=' . urlencode($relativePath) . '" title="Mở thư mục"><i class="fas fa-folder-open"></i></a>';
                        if (!$isOutsideBaseDir) {
                            echo '<button class="btn btn-copy" onclick="copyToClipboard(\'' . $folderUrl . '\')" title="Copy URL"><i class="fas fa-copy"></i></button>';
                        } else {
                            echo '<button class="btn btn-warning" onclick="showOutsideWarning()" title="Không thể copy URL bên ngoài CDN"><i class="fas fa-ban"></i></button>';
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                    
                    // Hiển thị tệp tin
                    foreach ($files as $item) {
                        $fullPath = $currentDir . '/' . $item;
                        $fileSize = @filesize($fullPath) ?: 0;
                        $fileUrl = $isOutsideBaseDir ? '' : $baseUrl . $requestedPath . $item;
                        
                        // Xác định loại tệp
                        $extension = pathinfo($item, PATHINFO_EXTENSION);
                        $fileType = strtoupper($extension) ?: 'File';
                        
                        echo '<div class="file-item">';
                        echo '<div class="file-name">';
                        echo '<span class="file-icon file"><i class="fas fa-file"></i></span>';
                        if (!$isOutsideBaseDir) {
                            echo '<a class="file-link" href="' . htmlspecialchars($fileUrl) . '" target="_blank">' . htmlspecialchars($item) . '</a>';
                        } else {
                            echo '<span class="file-link">' . htmlspecialchars($item) . '</span>';
                        }
                        echo '</div>';
                        echo '<div class="file-type">' . $fileType . '</div>';
                        echo '<div class="file-size">' . formatSize($fileSize) . '</div>';
                        echo '<div class="file-actions">';
                        if (!$isOutsideBaseDir) {
                            echo '<a class="btn" href="' . htmlspecialchars($fileUrl) . '" target="_blank" title="Xem file"><i class="fas fa-eye"></i></a>';
                            echo '<a class="btn" href="' . htmlspecialchars($fileUrl) . '" download title="Tải về"><i class="fas fa-download"></i></a>';
                            echo '<button class="btn btn-copy" onclick="copyToClipboard(\'' . $fileUrl . '\')" title="Copy URL"><i class="fas fa-copy"></i></button>';
                        } else {
                            echo '<button class="btn" onclick="showOutsideWarning()" title="Xem file"><i class="fas fa-eye"></i></button>';
                            echo '<button class="btn" onclick="showOutsideWarning()" title="Tải về"><i class="fas fa-download"></i></button>';
                            echo '<button class="btn btn-warning" onclick="showOutsideWarning()" title="Không thể copy URL bên ngoài CDN"><i class="fas fa-ban"></i></button>';
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                    
                    // Hiển thị thông báo nếu thư mục trống
                    if (empty($directories) && empty($files)) {
                        echo '<div class="empty-folder">';
                        echo '<i class="fas fa-folder" style="font-size: 48px; margin-bottom: 16px; opacity: 0.5;"></i>';
                        echo '<div>Thư mục trống</div>';
                        echo '</div>';
                    }
                    
                } catch (Exception $e) {
                    echo '<div class="empty-folder">';
                    echo '<i class="fas fa-exclamation-triangle" style="font-size: 48px; margin-bottom: 16px; color: var(--danger);"></i>';
                    echo '<div>Không có quyền đọc thư mục này</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>

        <footer>
            <p>CDN Browser &copy; <?php echo date('Y'); ?> |
                <?php echo $isOutsideBaseDir ? 'Đang duyệt bên ngoài CDN' : 'Đang trong thư mục CDN'; ?></p>
        </footer>
    </div>

    <div class="copy-notification" id="copyNotification">
        <i class="fas fa-check-circle"></i>
        <span>Đã copy URL!</span>
    </div>

    <script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            const notification = document.getElementById('copyNotification');
            notification.classList.add('show');
            setTimeout(() => notification.classList.remove('show'), 2000);
        });
    }

    function showOutsideWarning() {
        const notification = document.getElementById('copyNotification');
        notification.innerHTML =
            '<i class="fas fa-exclamation-triangle"></i><span>Không thể thao tác bên ngoài CDN!</span>';
        notification.style.background = 'var(--danger)';
        notification.classList.add('show');
        setTimeout(() => {
            notification.classList.remove('show');
            notification.innerHTML = '<i class="fas fa-check-circle"></i><span>Đã copy URL!</span>';
            notification.style.background = 'var(--success)';
        }, 3000);
    }

    // Thêm hiệu ứng loading khi nhấn vào thư mục lớn
    document.addEventListener('DOMContentLoaded', function() {
        const folderLinks = document.querySelectorAll('a[href*="path="]');
        folderLinks.forEach(link => {
            link.addEventListener('click', function() {
                this.closest('.file-item').classList.add('loading');
            });
        });
    });
    </script>
</body>

</html>