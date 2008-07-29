#include "php_cairo_api.h"
#include "CairoExceptionMacro.h"
#include "php_cairo_ce_ptr.h"

/* {{{ Class Cairo */
#define REGISTER_CAIRO_LONG_CONST(const_name, value) \
	zend_declare_class_constant_long(Cairo_ce_ptr, const_name, sizeof(const_name)-1, (long)value TSRMLS_CC);

static zend_class_entry *Cairo_ce_ptr;

static zend_object_handlers Cairo_handlers;

void class_init_Cairo(void)
{
    zend_class_entry ce;
    INIT_CLASS_ENTRY(ce, "Cairo", NULL);
    Cairo_ce_ptr = zend_register_internal_class(&ce);
    //Cairo_ce_ptr->create_object = Cairo_object_new;
	Cairo_ce_ptr->ce_flags |= ZEND_ACC_EXPLICIT_ABSTRACT_CLASS | ZEND_ACC_FINAL_CLASS;
	memcpy(&Cairo_handlers, zend_get_std_object_handlers(), sizeof(zend_object_handlers));
    Cairo_handlers.clone_obj = NULL;
	/* constants */
#if HAS_ATSUI_FONT
	REGISTER_CAIRO_LONG_CONST( "HAS_ATSUI_FONT", 1 );
#else
	REGISTER_CAIRO_LONG_CONST( "HAS_ATSUI_FONT", 0 );
#endif
#if HAS_FT_FONT
	REGISTER_CAIRO_LONG_CONST( "HAS_FT_FONT", 1 );
#else
	REGISTER_CAIRO_LONG_CONST( "HAS_FT_FONT", 0 );
#endif
#if HAS_GLITZ_SURFACE
	REGISTER_CAIRO_LONG_CONST( "HAS_GLITZ_SURFACE", 1 );
#else
	REGISTER_CAIRO_LONG_CONST( "HAS_GLITZ_SURFACE", 0 );
#endif
#if HAS_PDF_SURFACE
	REGISTER_CAIRO_LONG_CONST( "HAS_PDF_SURFACE", 1 );
#else
	REGISTER_CAIRO_LONG_CONST( "HAS_PDF_SURFACE", 0 );
#endif
#if HAS_PNG_FUNCTIONS
	REGISTER_CAIRO_LONG_CONST( "HAS_PNG_FUNCTIONS", 1 );
#else
	REGISTER_CAIRO_LONG_CONST( "HAS_PNG_FUNCTIONS", 0 );
#endif
#if HAS_PS_SURFACE
	REGISTER_CAIRO_LONG_CONST( "HAS_PS_SURFACE", 1 );
#else
	REGISTER_CAIRO_LONG_CONST( "HAS_PS_SURFACE", 0 );
#endif
#if HAS_SVG_SURFACE
	REGISTER_CAIRO_LONG_CONST( "HAS_SVG_SURFACE", 1 );
#else
	REGISTER_CAIRO_LONG_CONST( "HAS_SVG_SURFACE", 0 );
#endif
#if HAS_QUARTZ_SURFACE
	REGISTER_CAIRO_LONG_CONST( "HAS_QUARTZ_SURFACE", 1 );
#else
	REGISTER_CAIRO_LONG_CONST( "HAS_QUARTZ_SURFACE", 0 );
#endif
#if HAS_WIN32_FONT
	REGISTER_CAIRO_LONG_CONST( "HAS_WIN32_FONT", 1 );
#else
	REGISTER_CAIRO_LONG_CONST( "HAS_WIN32_FONT", 0 );
#endif
#if HAS_WIN32_SURFACE
	REGISTER_CAIRO_LONG_CONST( "HAS_WIN32_SURFACE", 1 );
#else
	REGISTER_CAIRO_LONG_CONST( "HAS_WIN32_SURFACE", 0 );
#endif
#if HAS_XCB_SURFACE
	REGISTER_CAIRO_LONG_CONST( "HAS_XCB_SURFACE", 1 );
#else
	REGISTER_CAIRO_LONG_CONST( "HAS_XCB_SURFACE", 0 );
#endif
#if HAS_XLIB_SURFACE
	REGISTER_CAIRO_LONG_CONST( "HAS_XLIB_SURFACE", 1 );
#else
	REGISTER_CAIRO_LONG_CONST( "HAS_XLIB_SURFACE", 0 );
#endif

#define CONSTANT(x) REGISTER_CAIRO_LONG_CONST( #x, CAIRO_##x)
	CONSTANT(ANTIALIAS_DEFAULT);
	CONSTANT(ANTIALIAS_NONE);
	CONSTANT(ANTIALIAS_GRAY);
	CONSTANT(ANTIALIAS_SUBPIXEL);

	CONSTANT(CONTENT_COLOR);
	CONSTANT(CONTENT_ALPHA);
	CONSTANT(CONTENT_COLOR_ALPHA);

	CONSTANT(EXTEND_NONE);
	CONSTANT(EXTEND_REPEAT);
	CONSTANT(EXTEND_REFLECT);
	CONSTANT(EXTEND_PAD);

	CONSTANT(FILL_RULE_WINDING);
	CONSTANT(FILL_RULE_EVEN_ODD);

	CONSTANT(FILTER_FAST);
	CONSTANT(FILTER_GOOD);
	CONSTANT(FILTER_BEST);
	CONSTANT(FILTER_NEAREST);
	CONSTANT(FILTER_BILINEAR);
	CONSTANT(FILTER_GAUSSIAN);

	CONSTANT(FONT_WEIGHT_NORMAL);
	CONSTANT(FONT_WEIGHT_BOLD);

	CONSTANT(FONT_SLANT_NORMAL);
	CONSTANT(FONT_SLANT_ITALIC);
	CONSTANT(FONT_SLANT_OBLIQUE);

	CONSTANT(FORMAT_ARGB32);
	CONSTANT(FORMAT_RGB24);
	CONSTANT(FORMAT_A8);
	CONSTANT(FORMAT_A1);
	CONSTANT(FORMAT_RGB16_565);

	CONSTANT(HINT_METRICS_DEFAULT);
	CONSTANT(HINT_METRICS_OFF);
	CONSTANT(HINT_METRICS_ON);

	CONSTANT(HINT_STYLE_DEFAULT);
	CONSTANT(HINT_STYLE_NONE);
	CONSTANT(HINT_STYLE_SLIGHT);
	CONSTANT(HINT_STYLE_MEDIUM);
	CONSTANT(HINT_STYLE_FULL);

	CONSTANT(LINE_CAP_BUTT);
	CONSTANT(LINE_CAP_ROUND);
	CONSTANT(LINE_CAP_SQUARE);

	CONSTANT(LINE_JOIN_MITER);
	CONSTANT(LINE_JOIN_ROUND);
	CONSTANT(LINE_JOIN_BEVEL);

	CONSTANT(OPERATOR_CLEAR);

	CONSTANT(OPERATOR_SOURCE);
	CONSTANT(OPERATOR_OVER);
	CONSTANT(OPERATOR_IN);
	CONSTANT(OPERATOR_OUT);
	CONSTANT(OPERATOR_ATOP);

	CONSTANT(OPERATOR_DEST);
	CONSTANT(OPERATOR_DEST_OVER);
	CONSTANT(OPERATOR_DEST_IN);
	CONSTANT(OPERATOR_DEST_OUT);
	CONSTANT(OPERATOR_DEST_ATOP);

	CONSTANT(OPERATOR_XOR);
	CONSTANT(OPERATOR_ADD);
	CONSTANT(OPERATOR_SATURATE);

	CONSTANT(PATH_MOVE_TO);
	CONSTANT(PATH_LINE_TO);
	CONSTANT(PATH_CURVE_TO);
	CONSTANT(PATH_CLOSE_PATH);

	CONSTANT(SUBPIXEL_ORDER_DEFAULT);
	CONSTANT(SUBPIXEL_ORDER_RGB);
	CONSTANT(SUBPIXEL_ORDER_BGR);
	CONSTANT(SUBPIXEL_ORDER_VRGB);
	CONSTANT(SUBPIXEL_ORDER_VBGR);
#undef CONSTANT

}

/* }}} Class Cairo */


