#!/usr/bin/env bash

./runseeds.sh testing
phpunit $1 $2 $3 $4

