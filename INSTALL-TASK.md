# Общая часть: установка Community Edition

Community Edition — бесплатная версия нашей платформы в Docker: один сайт, без ограничения по срокам.
Образы: [`sitebill/community-api`](https://hub.docker.com/r/sitebill/community-api) и
[`sitebill/community-web`](https://hub.docker.com/r/sitebill/community-web).

## Что сделать

1. Поднимите платформу:

```bash
mkdir sitebill-community && cd sitebill-community
curl -O https://www.sitebill.ru/storage/community/docker-compose.yml
curl -o .env https://www.sitebill.ru/storage/community/env.example
# откройте .env и задайте DB_PASSWORD и APP_URL
docker compose up -d
```

2. Откройте сайт (по умолчанию <http://localhost:3000>), пройдите мастер первого запуска,
   создайте администратора. Лицензионный ключ **не нужен**: версия работает бесплатно.
3. Заведите 3–5 тестовых объектов через админку.
4. Напишите короткий отчёт `INSTALL.md`:
   - сколько времени ушло, какая ОС и версия Docker;
   - какие команды запускали;
   - **где споткнулись**, чего не хватило в инструкции, что бы вы исправили.
5. Если за 45 минут не получилось, остановитесь и опишите, на чём застряли
   (приложите вывод `docker compose logs`). Это тоже нормальный результат.

## Что мы оцениваем

- Справились ли без нашей помощи и как оформили проблемы (воспроизводимо, с логами).
- Сделали ли выводы про инструкцию. Ваш отчёт помогает нам улучшить документацию, и это ценится.
