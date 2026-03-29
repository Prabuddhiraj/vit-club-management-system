#!/bin/bash
# Module 5 - Basic Shell Scripting

echo "=== VIT Club Daily Reminder $(date) ===" > /tmp/club_reminder.txt

# While loop example
count=1
while [ $count -le 5 ]
do
    echo "Task $count: Check equipment for today's events" >> /tmp/club_reminder.txt
    count=$((count+1))
done

# Case statement
day=$(date +%A)
case $day in
    "Monday") echo "Monday Special: Prepare projector" >> /tmp/club_reminder.txt ;;
    "Friday") echo "Friday Special: Collect feedback" >> /tmp/club_reminder.txt ;;
    *) echo "No special task today" >> /tmp/club_reminder.txt ;;
esac

cat /tmp/club_reminder.txt
echo "Reminder generated! (Check /tmp/club_reminder.txt)"
