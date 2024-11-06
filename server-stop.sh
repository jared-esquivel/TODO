lsof -i :3000 | awk '/^php/{print $2}' | xargs kill
pkill -f 'Visual Studio Code'
code .
