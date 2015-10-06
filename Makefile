all: grunt purge

grunt:
	cd amd && grunt

purge:
	sudo -uapache php $(PWD)/../../cli/purge_caches.php

ORIG_DIR := amd/orig
BUILD_DIR := amd/build
SRC_DIR := amd/src
ORIGINALS := $(wildcard $(ORIG_DIR)/*.js)
OBJ := $(patsubst $(ORIG_DIR)/%,$(SRC_DIR)/%,$(ORIGINALS))

$(BUILD_DIR)/%.js: $(ORIG_DIR)/%.js
	perl -C convert.pl $< | uglifyjs - --compress --manage --output $@

$(SRC_DIR)/%.js: $(ORIG_DIR)/%.js
	perl -C convert.pl $< >$@

convert: $(OBJ)

$(OBJ): convert.pl

clean:
	-rm $(OBJ)

.PHONY: all clean convert purge grunt
