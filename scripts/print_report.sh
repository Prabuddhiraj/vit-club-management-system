#!/bin/bash
# Module 2 - Printing service

echo "VIT Club Daily Report - $(date)" > /tmp/report.txt
echo "Events today: Check web/index.php" >> /tmp/report.txt
lp /tmp/report.txt
echo "Report sent to printer!"
