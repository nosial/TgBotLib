# Variables
DEFAULT_CONFIGURATION ?= release
LOG_LEVEL = debug

# Default Target
all: release release-compressed release-executable release-executable-compressed debug debug-compressed

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


install: release
	ncc package install --package=build/release/net.nosial.tgbotlib.ncc --skip-dependencies --build-source --reinstall -y --log-level $(LOG_LEVEL)

test: release
	[ -f phpunit.xml ] || { echo "phpunit.xml not found"; exit 1; }
	phpunit

clean:
	rm -rf build

.PHONY: all install test clean release release-compressed release-executable release-executable-compressed debug debug-compressed