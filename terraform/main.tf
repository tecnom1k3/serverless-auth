provider "aws" {
  profile    = "personal"
  region     = "us-east-1"
}

terraform {
  backend "s3" {
    bucket = "digitec-terraform"
    key    = "auth/terraform.tfstate"
    region = "us-east-1"
    profile = "personal"
    dynamodb_table = "terraform-locks"
    encrypt        = true
  }
}

resource "aws_dynamodb_table" "users" {
  hash_key = "uid"
  range_key = "userName"
  name = "auth_users"
  billing_mode = "PAY_PER_REQUEST"

  attribute {
    name = "uid"
    type = "S"
  }

  attribute {
    name = "userName"
    type = "S"
  }

  global_secondary_index {
    hash_key = "userName"
    name = "UserIndex"
    range_key = "uid"
    projection_type = "KEYS_ONLY"
  }
}

resource "aws_dynamodb_table" "roles" {

  hash_key = "id"
  name = "auth_roles"
  billing_mode = "PAY_PER_REQUEST"
  attribute {
    name = "id"
    type = "N"
  }
}

