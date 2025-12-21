#!/bin/bash
set -e

# Push local main → origin/main
git push origin main:main

# Push local main → wheelitin/development
git push wheelitin main:development

echo "✅ Pushed to origin/main and wheelitin/development"

