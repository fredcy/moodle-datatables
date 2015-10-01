all: grunt purge

grunt:
	cd amd && grunt

purge:
	sudo -uapache php $(PWD)/../../cli/purge_caches.php

ORIG_DIR := amd/orig
BUILD_DIR := amd/build
ORIGINALS := $(wildcard $(ORIG_DIR)/*.js)
OBJ := $(patsubst $(ORIG_DIR)/%,$(BUILD_DIR)/%,$(ORIGINALS))

$(BUILD_DIR)/%.js: $(ORIG_DIR)/%.js
	perl -C convert.pl $< | uglifyjs - --compress --manage --output $@

convert: $(OBJ)

clean:
	-rm $(OBJ)

.PHONY: all clean convert purge grunt
