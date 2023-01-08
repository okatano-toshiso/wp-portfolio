ssh-keygen -f "/home/runner/.ssh/known_hosts" -R "153.121.72.40"
rsync -acvz --delete ./ alma@153.121.72.40:/var/www/html/
