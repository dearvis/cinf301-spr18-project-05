#!/bin/bash

mkdir app
cp -r ../../../dist/frontend/web/app/* app
docker build -t api .
rm -rf app