module.exports = (sequelize, DataTypes) => {
  const Lessons = sequelize.define(
    "Lessons",
    {
      id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true,
        allowNUll: false,
      },
      name: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      video: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      chapter_id: {
        type: DataTypes.INTEGER,
        allowNUll: false,
      },
      createdAt: {
        type: DataTypes.DATE,
        field: "created_at",
        allowNUll: false,
      },
      updatedAt: {
        type: DataTypes.DATE,
        field: "updated_at",
        allowNUll: false,
      },
    },
    {
      tableName: "lessons",
      timestamps: true,
    }
  );
  return Lessons;
};
