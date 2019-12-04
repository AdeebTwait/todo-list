# ToDo List
Simple ToDo list application built with laravel 5.8.




### The list page
- After logging in, you will see the list that contains your tasks.
- There is a text field on the top of the list where you can create new tasks.
- You can click on any task to make it done/undone whithout the need for refreshing the page.
- When you hover on any task, a trash icon will show up, click on it to delete the task.

![Screen Shot 2019-12-04 at 2 53 28 PM](https://user-images.githubusercontent.com/16962426/70144717-34d5d580-16a7-11ea-9ab2-4b52458687e9.png)




### The profile page
- On this page you can see your profile data and update it.

![Screen Shot 2019-12-04 at 2 55 46 PM](https://user-images.githubusercontent.com/16962426/70144808-62bb1a00-16a7-11ea-878a-ef0a0b5759c6.png)





### Notes
- All of the created tables and columns were created by migrations, so please don't forget to run

```bash
php artisan migrate
```

- There is some deep security issues, but I didn't care much about it since this is a "simple" and quick-made app.


