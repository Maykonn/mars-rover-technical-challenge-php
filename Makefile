.PHONY: install update test clean-coverage

install:
	composer install
	make test

update:
	composer update
	composer dumpautoload
	make test

test: clean-coverage
	./vendor/bin/phpunit --testdox

clean-coverage:
	rm -rf ./test/_reports