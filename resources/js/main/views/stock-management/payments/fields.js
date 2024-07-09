import { ref } from "vue";
import { useI18n } from "vue-i18n";
import { useRoute } from "vue-router";
import common from "../../../../common/composable/common";

const fields = () => {
    const { t } = useI18n();
    const route = useRoute();
    const hashableColumns = ['payment_mode_id', 'user_id'];
    const { dayjs } = common();
    const paymentType = ref(route.meta.paymentType);
    const menuParent = ref(route.meta.menuParent);
    const addEditUrl = ref(`payment-${paymentType.value}`);

    const initData = ref({
        payment_type: paymentType.value,
        date: dayjs().format('YYYY-MM-DD'),
        amount: "",
        payment_mode_id: undefined,
        user_id: undefined,
        notes: "",
    });

    const columns = [
        {
            title: t("payments.date"),
            dataIndex: "date",
            sorter:true
        },
        {
            title: t("payments.transaction_number"),
            dataIndex: "payment_number",
            sorter:true
        },
        {
            title: t("payments.user"),
            dataIndex: "user_id",
            sorter:true
        },
        {
            title: t("payments.amount"),
            dataIndex: "amount",
            sorter:true
        },
        {
            title: t("common.action"),
            dataIndex: "action",
        },
    ];

    const filterableColumns = [
        {
            key: "payment_number",
            value: t("payments.transaction_number")
        },
    ];

    const settleInvoiceColumns = [
        {
            title: t("stock.invoice_number"),
            dataIndex: "invoice_number",
        },
        {
            title: t("common.date"),
            dataIndex: "date",
        },
        {
            title: t("payments.invoice_amount"),
            dataIndex: "amount",
        },
        {
            title: t("common.action"),
            dataIndex: "action",
        },
    ];

    return {
        addEditUrl,
        initData,
        columns,
        filterableColumns,
        hashableColumns,

        settleInvoiceColumns,
        paymentType,
        menuParent,
    }
}

export default fields;
