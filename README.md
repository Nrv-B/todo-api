# To-Do List API (Laravel)

Простой REST API для управления списком задач (To-Do List), реализованный на Laravel.

Проект создан в рамках тестового задания на позицию Junior PHP Developer.

---

##  Функциональность

- Создание задачи
- Получение списка задач
- Получение одной задачи
- Обновление задачи
- Удаление задачи
- Валидация входных данных
- Пагинация списка задач

---

##  Стек технологий

- PHP 8+
- Laravel
- MySQL / SQLite
- Eloquent ORM
- Laravel Form Request Validation
- API Resources

---

## API Endpoints

| Метод | URL | Описание |
|------|-----|----------|
| POST | /api/v1/tasks | Создать задачу |
| GET | /api/v1/tasks | Получить список задач |
| GET | /api/v1/tasks/{id} | Получить одну задачу |
| PUT | /api/v1/tasks/{id} | Обновить задачу |
| DELETE | /api/v1/tasks/{id} | Удалить задачу |

---

## Пример запроса (POST /tasks)

```json
{
  "message": "Task created successfully",
  "data": {
    "id": 1,
    "title": "Learn Laravel",
    "description": "Build To-Do API project",
    "status": false
  }
}
