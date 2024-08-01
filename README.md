
# composer  install

# php artisan migrate

# php artisan db:seed --class=DatabaseSeeder

# POST: http://127.0.0.1:8000/graphql

## Create Task:
{
  "query": "mutation { createTask(title: \"New Task\", description: \"Task Description\", is_completed: true) { id title description is_completed } }"
}

## Update Task:
{
  "query": "mutation { updateTask(id: 1, title: \"Updated Task Title\", description: \"Updated Description\", is_completed: true) { id title description is_completed } }"
}

## Delete Task:
{
  "query": "mutation { deleteTask(id: 1) }"
}

## Fetch All Tasks:
{
  "query": "{ tasks { id title description is_completed } }"
}

## Login:
{
  "query": "mutation { login(email: \"user@example.com\", password: \"password\") { token user { id name email } } }"
}

## Logout:
{
  "query": "mutation { logout }"
}

# php artisan serve
