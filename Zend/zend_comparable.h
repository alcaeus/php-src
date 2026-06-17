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

#ifndef ZEND_COMPARABLE_H
#define ZEND_COMPARABLE_H

#include "zend.h"
#include "zend_API.h"
#include "zend_comparable_decl.h"

BEGIN_EXTERN_C()

extern ZEND_API zend_class_entry *zend_ce_comparable;
extern ZEND_API zend_class_entry *zend_ce_compareresult;

ZEND_API void zend_register_comparable_ce(void);
zend_enum_CompareResult compareresult_from_int(int result);
int compareresult_to_int(zend_enum_CompareResult result);

END_EXTERN_C()

#endif /* ZEND_COMPARABLE_H */
