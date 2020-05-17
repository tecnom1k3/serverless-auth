#!/usr/bin/env bash
awslocal dynamodb create-table --cli-input-json file://dynamodb_table_auth_users.json
awslocal dynamodb create-table --cli-input-json file://dynamodb_table_auth_roles.json
awslocal dynamodb put-item --table-name auth_users --item '{"uid": {"S": "foo"}, "userName":{"S": "bar"}}'
