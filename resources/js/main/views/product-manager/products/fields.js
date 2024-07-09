import { ref } from "vue";
import { useI18n } from "vue-i18n";

const fields = () => {
    const addEditUrl = "products";
    const { t } = useI18n();
    const hashableColumns = ["unit_id", "category_id", "brand_id", "tax_id"];
    const multiDimensalObjectColumns = {
        stock_quantitiy_alert: "details.stock_quantitiy_alert",
        mrp: "details.mrp",
        purchase_price: "details.purchase_price",
        sales_price: "details.sales_price",
        tax_id: "details.x_tax_id",
        purchase_tax_type: "details.purchase_tax_type",
        sales_tax_type: "details.sales_tax_type",
        opening_stock: "details.opening_stock",
        opening_stock_date: "details.opening_stock_date",
        wholesale_price: "details.wholesale_price",
        wholesale_quantity: "details.wholesale_quantity",
    };

    const initData = {
        warehouse_id: undefined,
        name: "",
        slug: "",
        image: undefined,
        image_url: undefined,
        barcode_symbology: "CODE128",
        item_code: "",
        stock_quantitiy_alert: null,
        category_id: undefined,
        brand_id: undefined,
        mrp: 0,
        purchase_price: 0,
        sales_price: 0,
        tax_id: undefined,
        unit_id: undefined,
        description: "",
        purchase_tax_type: "exclusive",
        sales_tax_type: "exclusive",
        custom_fields: [],
        opening_stock: undefined,
        opening_stock_date: undefined,
        wholesale_price: undefined,
        wholesale_quantity: undefined,
        product_type: "single",
        variations: [],
    };
    const productType = ref("single");

    const columnsNames = [
        {
            title: "",
            dataIndex: "status",
        },
        {
            title: t("product.product"),
            dataIndex: "name",
            sorter: true,
            sorter_field: "products.name",
        },
        {
            title: t("product.product_type"),
            dataIndex: "product_type",
            sorter: true,
            sorter_field: "products.product_type",
        },
        {
            title: t("product.category"),
            dataIndex: "category_id",
        },
        {
            title: t("product.brand"),
            dataIndex: "brand_id",
        },
        // {
        //     title: t("product.sales_price"),
        //     dataIndex: "sales_price",
        //     // sorter: productType.value == "single" ? true : false,
        //     // sorter_field: "product_details.sales_price",
        // },
        // {
        //     title: t("product.purchase_price"),
        //     dataIndex: "purchase_price",
        //     // sorter: productType.value == "single" ? true : false,
        //     // sorter_field: "product_details.purchase_price",
        // },
    ];

    const columns = ref([
        ...columnsNames,
        {
            title: t("product.current_stock"),
            dataIndex: "current_stock",
            sorter: productType.value == "single" ? true : false,
            sorter_field: "product_details.current_stock",
        },
        {
            title: t("common.action"),
            dataIndex: "action",
        },
    ]);

    const variableProductcolumns = [
        {
            title: t("product.product"),
            dataIndex: "name",
        },
        {
            title: t("product.category"),
            dataIndex: "category_id",
        },
        {
            title: t("product.brand"),
            dataIndex: "brand_id",
        },
        {
            title: t("common.action"),
            dataIndex: "action",
        },
    ];

    const variantColumns = [
        {
            title: t("product.product"),
            dataIndex: "name",
        },
        {
            title: t("product.product_type"),
            dataIndex: "product_type",
            sorter: true,
            sorter_field: "products.product_type",
        },
        {
            title: t("product.item_code"),
            dataIndex: "item_code",
        },
        {
            title: t("product.sales_price"),
            dataIndex: "sales_price",
        },
        {
            title: t("product.purchase_price"),
            dataIndex: "purchase_price",
        },
        {
            title: t("product.current_stock"),
            dataIndex: "current_stock",
        },
        {
            title: t("common.action"),
            dataIndex: "action",
        },
    ];

    const filterableColumns = [
        {
            key: "name",
            value: t("product.name"),
        },
        {
            key: "item_code",
            value: t("product.item_code"),
        },
    ];

    return {
        columnsNames,
        addEditUrl,
        initData,
        productType,
        columns,
        variableProductcolumns,
        variantColumns,
        filterableColumns,
        hashableColumns,
        multiDimensalObjectColumns,
    };
};

export default fields;
