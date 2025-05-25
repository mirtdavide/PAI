<?php
$mysqli = new mysqli("localhost", "root", "", "pai");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$userMail = $_GET['user'] ?? '';

$stmt = $mysqli->prepare("SELECT username, mail, role, country, registre_date FROM users WHERE mail = ?");
$stmt->bind_param("s", $userMail);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "<h2>User not found</h2>";
    exit;
}
$originalDate = $user['registre_date'];
$formattedDate = date("M j, Y", strtotime($originalDate));
// Optional: fetch stats
$posts = $mysqli->query("SELECT COUNT(*) AS count FROM posts WHERE user = '$userMail'")->fetch_assoc()['count'];
$threads = $mysqli->query("SELECT COUNT(*) AS count FROM thread WHERE user = '$userMail'")->fetch_assoc()['count'];
$total = $posts + $threads;
$countries = [
  "AF" => "🇦🇫 Afghanistan",
  "AL" => "🇦🇱 Albania",
  "DZ" => "🇩🇿 Algeria",
  "AD" => "🇦🇩 Andorra",
  "AO" => "🇦🇴 Angola",
  "AR" => "🇦🇷 Argentina",
  "AM" => "🇦🇲 Armenia",
  "AU" => "🇦🇺 Australia",
  "AT" => "🇦🇹 Austria",
  "AZ" => "🇦🇿 Azerbaijan",
  "BH" => "🇧🇭 Bahrain",
  "BD" => "🇧🇩 Bangladesh",
  "BY" => "🇧🇾 Belarus",
  "BE" => "🇧🇪 Belgium",
  "BZ" => "🇧🇿 Belize",
  "BJ" => "🇧🇯 Benin",
  "BO" => "🇧🇴 Bolivia",
  "BR" => "🇧🇷 Brazil",
  "BG" => "🇧🇬 Bulgaria",
  "CA" => "🇨🇦 Canada",
  "CL" => "🇨🇱 Chile",
  "CN" => "🇨🇳 China",
  "CO" => "🇨🇴 Colombia",
  "HR" => "🇭🇷 Croatia",
  "CU" => "🇨🇺 Cuba",
  "CZ" => "🇨🇿 Czech Republic",
  "DK" => "🇩🇰 Denmark",
  "EG" => "🇪🇬 Egypt",
  "FI" => "🇫🇮 Finland",
  "FR" => "🇫🇷 France",
  "DE" => "🇩🇪 Germany",
  "GR" => "🇬🇷 Greece",
  "HU" => "🇭🇺 Hungary",
  "IN" => "🇮🇳 India",
  "ID" => "🇮🇩 Indonesia",
  "IR" => "🇮🇷 Iran",
  "IQ" => "🇮🇶 Iraq",
  "IE" => "🇮🇪 Ireland",
  "IT" => "🇮🇹 Italy",
  "JP" => "🇯🇵 Japan",
  "KR" => "🇰🇷 South Korea",
  "MY" => "🇲🇾 Malaysia",
  "MX" => "🇲🇽 Mexico",
  "NL" => "🇳🇱 Netherlands",
  "NZ" => "🇳🇿 New Zealand",
  "NG" => "🇳🇬 Nigeria",
  "NO" => "🇳🇴 Norway",
  "PK" => "🇵🇰 Pakistan",
  "PE" => "🇵🇪 Peru",
  "PH" => "🇵🇭 Philippines",
  "PL" => "🇵🇱 Poland",
  "PT" => "🇵🇹 Portugal",
  "RU" => "🇷🇺 Russia",
  "SA" => "🇸🇦 Saudi Arabia",
  "RS" => "🇷🇸 Serbia",
  "SG" => "🇸🇬 Singapore",
  "ZA" => "🇿🇦 South Africa",
  "ES" => "🇪🇸 Spain",
  "SE" => "🇸🇪 Sweden",
  "CH" => "🇨🇭 Switzerland",
  "TH" => "🇹🇭 Thailand",
  "TR" => "🇹🇷 Turkey",
  "UA" => "🇺🇦 Ukraine",
  "AE" => "🇦🇪 United Arab Emirates",
  "GB" => "🇬🇧 United Kingdom",
  "US" => "🇺🇸 United States",
  "VN" => "🇻🇳 Vietnam"
];

$selectedCountry = $user['country'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userMail = $_GET['user'] ?? '';
    $newUsername = trim($_POST['username'] ?? '');
    $newCountry = $_POST['country'] ?? '';

    if ($userMail && $newUsername && $newCountry) {
        $stmt = $mysqli->prepare("UPDATE users SET username = ?, country = ? WHERE mail = ?");
        $stmt->bind_param("sss", $newUsername, $newCountry, $userMail);
        $stmt->execute();
        $stmt->close();
    }

    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
    $tmpName = $_FILES['profile_image']['tmp_name'];
    $imgData = file_get_contents($tmpName);
    
    $userMail = $_GET['user'] ?? '';
    $stmt = $mysqli->prepare("UPDATE users SET profile_image = ? WHERE mail = ?");
    
    $stmt->bind_param("bs", $imgDataRef, $userMail); 
    $imgDataRef = null;
    $stmt->send_long_data(0, $imgData); 

    $stmt->execute();
    $stmt->close();
}


header("Location: profile.php?user=" . urlencode($userMail));
exit;
}

$stmt->close();
?>
<html>
    <head>
        <link rel="stylesheet" href="profile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        
    </head>
    <body>
        <?php require 'header.php'; ?>


        <div class="main-container">

            <div class = "top-container">
                <div class="container-title">
                    <p>Member-info</p> 
                </div>
                <form action="update_profile.php?user=<?= urlencode($user['mail']) ?>" method="POST" enctype="multipart/form-data">
                <div class="profile">
                    <div class="profile-container">
                    <label for="fileInput">
                        <img src="image.php?mail=<?= urlencode($user['mail']) ?>" alt="Profile image" id="preview">
                    </label>
                    <input type="file" name="profile_image" id="fileInput" accept="image/*" style="display: none;">
                    </div>

                    <div class="profile-info">
                    <input class="username-label" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>

                    <div class="label-list">
                        <span class="label moderator">Forum Moderator</span>
                        <span class="label developer"><?= htmlspecialchars($user['role']) ?></span>
                    </div>

                    <div class="country-wrapper">
                        <span class="role-country">Administrator - From:</span>
                        <select name="country" id="country-select" class="country-select">
                        <?php foreach ($countries as $code => $name): ?>
                            <option value="<?= $code ?>" <?= $code === $user['country'] ? 'selected' : '' ?>><?= $name ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>

                    <span class="joined-label">Joined: <?= htmlspecialchars($formattedDate) ?></span>

                    <div class="stats-container">
                        <div class="stat"><span class="stat-label">Posts</span><span class="value"><?= htmlspecialchars($posts) ?></span></div>
                        <div class="stat"><span class="stat-label">Replies</span><span class="value"><?= htmlspecialchars($threads) ?></span></div>
                        <div class="stat"><span class="stat-label">Total</span><span class="value"><?= htmlspecialchars($total) ?></span></div>
                    </div>

                    <button type="submit" class="load-more-button">Save Changes</button>
                    </div>
                </div>
                </form>

            </div>
        </div>
        <?php require 'footer.php'; ?>      
    </body>    
</html>
<script>
document.getElementById('fileInput').addEventListener('change', function (e) {
  const [file] = e.target.files;
  if (file) {
    document.getElementById('preview').src = URL.createObjectURL(file);
  }
});
</script>