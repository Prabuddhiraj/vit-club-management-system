#!/bin/bash
# Module 2 - Compress and Extract

tar -czf ~/club-management-system/backups/club_backup_$(date +%Y%m%d).tar.gz ../web ../scripts
echo "Backup completed and compressed into backups/ folder!"
