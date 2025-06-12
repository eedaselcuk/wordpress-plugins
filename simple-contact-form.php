<?php
/*
Plugin Name: Simple Contact Form
Description: Basit iletişim formu ekler ve mesajları e-posta ile gönderir.
Version: 1.0
Author: Elif Eda Selçuk
*/

function scf_form_shortcode() {
    $html = '<form method="post">
        <input type="text" name="scf_name" placeholder="Adınız" required><br><br>
        <input type="email" name="scf_email" placeholder="E-posta" required><br><br>
        <textarea name="scf_message" placeholder="Mesajınız" required></textarea><br><br>
        <input type="submit" name="scf_submit" value="Gönder">
    </form>';

    return $html;
}
add_shortcode('simple_contact_form', 'scf_form_shortcode');

function scf_handle_form_submission() {
    if (isset($_POST['scf_submit'])) {
        $name = sanitize_text_field($_POST['scf_name']);
        $email = sanitize_email($_POST['scf_email']);
        $message = sanitize_textarea_field($_POST['scf_message']);

        $to = get_option('admin_email');
        $subject = "Yeni Mesaj - Simple Contact Form";
        $body = "Ad: $name\nE-posta: $email\n\nMesaj:\n$message";

        wp_mail($to, $subject, $body);
        echo "<p style='color:green;'>Mesajınız gönderildi!</p>";
    }
}
add_action('init', 'scf_handle_form_submission');
