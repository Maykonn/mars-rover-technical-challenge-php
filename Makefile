.PHONY: install update test

install:
	composer install
	make test

update:
	composer update
	composer dumpautoload
	make test

test:
	./vendor/bin/phpunit --testdox