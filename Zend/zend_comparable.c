/*
   +----------------------------------------------------------------------+
   | Zend Engine                                                          |
   +----------------------------------------------------------------------+
   | Copyright © Zend Technologies Ltd., a subsidiary company of          |
   |     Perforce Software, Inc., and Contributors.                       |
   +----------------------------------------------------------------------+
   | This source file is subject to the Modified BSD License that is      |
   | bundled with this package in the file LICENSE, and is available      |
   | through the World Wide Web at <https://www.php.net/license/>.        |
   |                                                                      |
   | SPDX-License-Identifier: BSD-3-Clause                                |
   +----------------------------------------------------------------------+
   | Authors: Andreas Braun <alcaeus@php.net>                             |
   +----------------------------------------------------------------------+
*/

#include "zend_API.h"
#include "zend_comparable.h"
#include "zend_exceptions.h"
#include "zend_enum.h"
#include "zend_comparable_arginfo.h"

ZEND_API zend_class_entry *zend_ce_comparable;
ZEND_API zend_class_entry *zend_ce_compareresult;

static int zend_implement_comparable(zend_class_entry *interface, zend_class_entry *class_type)
{
	class_type->compareto = zend_hash_str_find_ptr_lc(&class_type->function_table, ZEND_STRL("compareTo"));
	if (UNEXPECTED(class_type->compareto == NULL)) {
		zend_error_noreturn(E_CORE_ERROR, "Couldn't find implementation for method %s::%s", ZSTR_VAL(class_type->name), "compareTo");
	}

	return SUCCESS;
}

ZEND_API void zend_register_comparable_ce(void)
{
	zend_ce_comparable = register_class_Comparable();
	zend_ce_comparable->interface_gets_implemented = zend_implement_comparable;

	zend_ce_compareresult = register_class_CompareResult();
}

zend_enum_CompareResult compareresult_from_int(int result)
{
	return result < 0 ? ZEND_ENUM_CompareResult_Smaller
		: result > 0 ? ZEND_ENUM_CompareResult_Greater
		: ZEND_ENUM_CompareResult_Equal;
}

int compareresult_to_int(zend_enum_CompareResult result)
{
	switch (result)
	{
		case ZEND_ENUM_CompareResult_Smaller:
			return -1;
		case ZEND_ENUM_CompareResult_Equal:
			return 0;
		case ZEND_ENUM_CompareResult_Greater:
			return 1;
		case ZEND_ENUM_CompareResult_Uncomparable:
			return ZEND_UNCOMPARABLE;
		default:
			ZEND_UNREACHABLE();
	}
}
