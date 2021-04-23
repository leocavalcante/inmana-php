# Inmana PHP

🚀 Developing [Rocketseat](https://rocketseat.com.br/) 's [Next Level Week](https://nextlevelweek.com/) (NLW#05) Application using [Swoole](https://www.swoole.co.uk/) + [Hyperf](https://hyperf.io/).

> This is the app of the [Elixir track](https://nextlevelweek.com/episodios/elixir/3/edicao/5).

| I know PHP/Swoole | I know NLW#5 |
| --- | --- |
| The Next Level Week is a sprint promoted by the education company Rocketseat to help in the learning of new technologies. Unfortunately they don't officially support a PHP track, but we love PHP specially when it comes with Swoole. | This is the following of the Elixir track, but using Swoole (instead of regular PHP-FPM), a high-performance server for PHP applications inspired on Erlang, and Hyper, a MVC framework analog to Phoenix, that supports Coroutines as first-class. |

## Comparison table

| | Language | Server | Framework | ORM |
| --- | --- | --- | --- | --- |
| **From** | Elixir | GenServer | Phoenix | Ecto |
| **To** | **PHP** | **Swoole** | **Hyperf** | **Hyperf-Eloquent** |

For the REPL (iex) you can use [gokure/hyperf-tinker](https://packagist.org/packages/gokure/hyperf-tinker).

The mail component for Elixir was based on the third-party [Bamboo](https://github.com/thoughtbot/bamboo) project, **same here, it uses [hyperf-ext/mail](https://github.com/hyperf-ext/mail)** (both running locally with logs, but with a wide range of transports/adapters available).  

> Check `/runtime/logs/hyperf.log` for sent emails.

## Trying out

### Up development environment

```shell
docker compose run --rm --service-ports app
```

This will start an interactive shell inside a container-based development environment.<br>
**The following commands should be executed inside this shell session.**

> If you don't want to use Docker you can skip this step, just make sure you have a running MySQL server.

### Install dependencies
```shell
composer install
```

### Configure
Make sure to change `.env` for proper values (like setting `DB_HOST` to `db` if in Docker) and adding passwords.

### Run migrations
```shell
php bin/hyperf.php migrate
```

### Start the server (and watch for changes)
```shell
php bin/hyperf.php server:watch
```
