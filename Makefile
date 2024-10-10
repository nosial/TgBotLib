# Variables
DEFAULT_CONFIG ?= release
LOG_LEVEL = debug
PACKAGE = build/$(CONFIG)/net.nosial.tgbotlib.ncc

# Default Target
all: build

# Build Steps
release:
	ncc build --config=release --log-level $(LOG_LEVEL)
release-compressed:
	ncc build --config=release-compressed --log-level $(LOG_LEVEL)
release-executable:
	ncc build --config=release-executable --log-level $(LOG_LEVEL)
release-executable-compressed:
	ncc build --config=release-executable-compressed --log-level $(LOG_LEVEL)
debug:
	ncc build --config=debug --log-level $(LOG_LEVEL)
debug-compressed:
	ncc build --config=debug-compressed --log-level $(LOG_LEVEL)

build: release release-compressed release-executable release-executable-compressed debug debug-compressed

install: build
	ncc package install --package=$(PACKAGE) --skip-dependencies --build-source --reinstall -y --log-level $(LOG_LEVEL)

test: build
	[ -f phpunit.xml ] || { echo "phpunit.xml not found"; exit 1; }
	phpunit

clean:
	rm -rf build

.PHONY: all build install test clean