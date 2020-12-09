#!/bin/bash

# Clone target-repo
git clone https://github.com/rok9ru/trpo-core core

# Get current branch
git symbolic-ref --short -q HEAD > version