<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CaptchaController extends Controller
{
    /**
     * Generate captcha image and store code in session.
     */
    public function generate()
    {
        // Set headers to prevent caching
        header('Content-Type: image/png');
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Generate a random code (avoiding confusing characters like 0, O, 1, I, L)
        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        $code = '';
        for ($i = 0; $i < 5; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Store lowercase code in session for case-insensitive validation
        Session::put('captcha_code', strtolower($code));

        // Create image
        $width = 140;
        $height = 42;
        $image = imagecreatetruecolor($width, $height);

        // Define colors
        $bg = imagecolorallocate($image, 248, 249, 250); // Light gray background (#f8f9fa)
        $primaryColor = imagecolorallocate($image, 3, 47, 103); // Quin Dark Blue (#032f67)
        $accentColor = imagecolorallocate($image, 228, 161, 27); // Quin Gold (#e4a11b)
        $noiseColor = imagecolorallocate($image, 215, 219, 224); // Light grey noise

        // Fill background
        imagefilledrectangle($image, 0, 0, $width, $height, $bg);

        // Add visual noise - grid/dots
        for ($i = 0; $i < 60; $i++) {
            imagesetpixel($image, rand(0, $width), rand(0, $height), $noiseColor);
        }

        // Draw 3 random lines across the captcha for bot prevention
        for ($i = 0; $i < 3; $i++) {
            $lineColor = (rand(0, 1) === 0) ? $accentColor : $noiseColor;
            imageline($image, rand(0, $width / 2), rand(0, $height), rand($width / 2, $width), rand(0, $height), $lineColor);
        }

        // Font settings (built-in font 5 is the largest default PHP font: 9x15 pixels)
        $font = 5;
        $charWidth = imagefontwidth($font);
        $charHeight = imagefontheight($font);

        // Calculate positioning for horizontal centering
        $totalTextWidth = ($charWidth + 4) * strlen($code);
        $startX = ($width - $totalTextWidth) / 2 + 5;
        $startY = ($height - $charHeight) / 2;

        // Draw each character with slight rotation/offset and bold simulation
        for ($i = 0; $i < strlen($code); $i++) {
            $char = $code[$i];
            $x = $startX + ($i * ($charWidth + 4)) + rand(-1, 1);
            $y = $startY + rand(-3, 3);
            
            // Randomly pick Quin's branding color or gold for each character
            $color = (rand(0, 1) === 0) ? $primaryColor : $accentColor;

            // Draw character multiple times with a 1px offset to simulate a bold weight
            imagechar($image, $font, $x, $y, $char, $color);
            imagechar($image, $font, $x + 1, $y, $char, $color);
            imagechar($image, $font, $x, $y + 1, $char, $color);
            imagechar($image, $font, $x + 1, $y + 1, $char, $color);
        }

        // Output image as PNG
        imagepng($image);
        imagedestroy($image);
        exit;
    }

    /**
     * Provide API response for refreshing captcha.
     */
    public function refresh()
    {
        return response()->json([
            'url' => route('captcha.image') . '?t=' . time()
        ]);
    }
}
