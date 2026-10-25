<?php
// Shared form fields used by index.php (blank) and edit.php (filled in)
// $a = existing application (array) or null
$v = function ($key) use ($a) {
    return htmlspecialchars($a[$key] ?? '');
};
$platforms = ['Instagram', 'Facebook', 'TikTok', 'X (Twitter)', 'LinkedIn', 'YouTube', 'Pinterest'];
?>
<div class="form-grid">
    <div class="field">
        <label>First Name</label>
        <input type="text" name="first_name" value="<?= $v('first_name') ?>" required>
    </div>
    <div class="field">
        <label>Last Name</label>
        <input type="text" name="last_name" value="<?= $v('last_name') ?>" required>
    </div>

    <div class="field">
        <label>Email</label>
        <input type="email" name="email" value="<?= $v('email') ?>" required>
    </div>
    <div class="field">
        <label>Phone Number</label>
        <input type="text" name="phone" value="<?= $v('phone') ?>" required>
    </div>

    <div class="field">
        <label>Years of Experience</label>
        <input type="number" name="years_experience" min="0" value="<?= $v('years_experience') ?>" required>
    </div>
    <div class="field">
        <label>Primary Platform</label>
        <select name="primary_platform" required>
            <option value="">-- Select platform --</option>
            <?php foreach ($platforms as $p): ?>
                <option value="<?= $p ?>" <?= (($a['primary_platform'] ?? '') === $p) ? 'selected' : '' ?>><?= $p ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="field">
        <label>Portfolio Link</label>
        <input type="url" name="portfolio_link" placeholder="https://..." value="<?= $v('portfolio_link') ?>">
    </div>
    <div class="field">
        <label>Expected Salary (per month)</label>
        <div class="peso-input"><span>₱</span><input type="number" step="0.01" min="0" name="expected_salary" placeholder="0.00" value="<?= $v('expected_salary') ?>" required></div>
    </div>

    <div class="field full">
        <label>Cover Letter</label>
        <textarea name="cover_letter" rows="4"><?= $v('cover_letter') ?></textarea>
    </div>
</div>