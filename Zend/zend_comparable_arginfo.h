/* This is a generated file, edit zend_comparable.stub.php instead.
 * Stub hash: 508060bffc737e340efe832dc1e5687a5b646e69
 * Has decl header: yes */

ZEND_BEGIN_ARG_WITH_RETURN_OBJ_TYPE_MASK_EX(arginfo_class_Comparable_compareTo, 0, 1, CompareResult, MAY_BE_LONG)
	ZEND_ARG_TYPE_INFO(0, other, IS_MIXED, 0)
ZEND_END_ARG_INFO()


static const zend_function_entry class_Comparable_methods[] = {
	ZEND_RAW_FENTRY("compareTo", NULL, arginfo_class_Comparable_compareTo, ZEND_ACC_PUBLIC|ZEND_ACC_ABSTRACT, NULL, NULL)
	ZEND_FE_END
};

static zend_class_entry *register_class_CompareResult(void)
{
	zend_class_entry *class_entry = zend_register_internal_enum("CompareResult", IS_LONG, NULL);

	zval enum_case_Smaller_value;
	ZVAL_LONG(&enum_case_Smaller_value, -1);
	zend_enum_add_case_cstr(class_entry, "Smaller", &enum_case_Smaller_value);

	zval enum_case_Equal_value;
	ZVAL_LONG(&enum_case_Equal_value, 0);
	zend_enum_add_case_cstr(class_entry, "Equal", &enum_case_Equal_value);

	zval enum_case_Greater_value;
	ZVAL_LONG(&enum_case_Greater_value, 1);
	zend_enum_add_case_cstr(class_entry, "Greater", &enum_case_Greater_value);

	zval enum_case_Uncomparable_value;
	ZVAL_LONG(&enum_case_Uncomparable_value, 2);
	zend_enum_add_case_cstr(class_entry, "Uncomparable", &enum_case_Uncomparable_value);

	return class_entry;
}

static zend_class_entry *register_class_Comparable(void)
{
	zend_class_entry ce, *class_entry;

	INIT_CLASS_ENTRY(ce, "Comparable", class_Comparable_methods);
	class_entry = zend_register_internal_interface(&ce);

	return class_entry;
}
