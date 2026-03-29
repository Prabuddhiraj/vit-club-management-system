#!/bin/bash
# Module 3 - Multimedia applications (audio recording)

echo "Recording voice note for 10 seconds... Speak now!"
arecord -d 10 -f cd ~/club-management-system/backups/voice_$(date +%Y%m%d_%H%M).wav
echo "Voice note saved as: backups/voice_$(date +%Y%m%d_%H%M).wav"
echo "Copy this path into feedback.php"
