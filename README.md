# To-Do List API (Laravel)

REST API для управления списком задач (To-Do List), реализованный на Laravel.

Проект создан в рамках pet-проекта с фокусом на архитектуру, безопасность и best practices Laravel.

---

##  Функциональность

###  Аутентификация
- Регистрация пользователя
- Авторизация (login)
- Logout (удаление токена)
- Защита маршрутов через Sanctum

###  Управление задачами
- Создание задачи
- Получение списка задач (с пагинацией)
- Получение одной задачи
- Обновление задачи
- Удаление задачи

###  Безопасность
- Валидация входных данных (Form Request)
- Rate Limiting для API и login
- Защита от brute-force атак
- Ограничение доступа к данным пользователя

---

##  Стек технологий

- PHP 8+
- Laravel
- MySQL / SQLite
- Eloquent ORM
- Laravel Sanctum
- Laravel Form Request Validation
- API Resources
- Laravel Rate Limiting
- Middleware

---

##  API Endpoints

###  Auth

| Метод | URL | Описание |
|------|-----|----------|
| POST | /api/v1/register | Регистрация |
| POST | /api/v1/login | Авторизация |
| POST | /api/v1/logout | Выход (logout) |

###  Tasks (требуют авторизации)

| Метод | URL | Описание |
|------|-----|----------|
| POST | /api/v1/tasks | Создать задачу |
| GET | /api/v1/tasks | Получить список задач |
| GET | /api/v1/tasks/{id} | Получить одну задачу |
| PUT | /api/v1/tasks/{id} | Обновить задачу |
| DELETE | /api/v1/tasks/{id} | Удалить задачу |

---

## Rate Limiting

- Общие API-запросы: **30 запросов в минуту**
- Авторизация (login): **5 попыток в минуту**
- Ограничения реализованы через `RateLimiter` и middleware `throttle`
- Кастомный JSON-ответ при превышении лимита

```json
{
  "message": "Too Many Attempts"
}
